// Import Chart.js
import {
  Chart, LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip,
} from 'chart.js';
import 'chartjs-adapter-moment';

// Import utilities
import { tailwindConfig, formatValue, hexToRGB } from '../utils';

Chart.register(LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard05 = () => {
  const ctx = document.getElementById('dashboard-card-05');
  if (!ctx) return;

  let range = 35;
  let increment = 0;

  fetch('/json-data-feed?datatype=5&limit=' + range)
    .then(a => {
      return a.json();
    })
    .then(result => {

      // Fake real-time labels
      const generateDates = () => {
        const now = new Date();
        const dates = [];
        result.data.forEach((v, i) => {
          dates.push(new Date(now - 2000 - i * 2000));
        });
        return dates;
      };

      const labels = generateDates();
      const slicedData = result.data.slice(0, range);
      const slicedLabels = labels.slice(0, range).reverse();

      const chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: slicedLabels,
          datasets: [
            // Indigo line
            {
              data: slicedData,
              fill: true,
              backgroundColor: `rgba(${hexToRGB(tailwindConfig().theme.colors.blue[500])}, 0.08)`,
              borderColor: tailwindConfig().theme.colors.indigo[500],
              borderWidth: 2,
              tension: 0,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: tailwindConfig().theme.colors.indigo[500],
              clip: 20,
            },
          ],
        },
        options: {
          layout: {
            padding: 20,
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
              },
              suggestedMin: 30,
              suggestedMax: 80,
              ticks: {
                maxTicksLimit: 5,
                callback: (value) => formatValue(value),
              },
            },
            x: {
              type: 'time',
              time: {
                parser: 'hh:mm:ss',
                unit: 'second',
                tooltipFormat: 'MMM DD, H:mm:ss a',
                displayFormats: {
                  second: 'H:mm:ss',
                },
              },
              grid: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                autoSkipPadding: 48,
                maxRotation: 0,
              },
            },
          },
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              titleFont: {
                weight: '600',
              },
              callbacks: {
                label: (context) => formatValue(context.parsed.y),
              },
            },
          },
          interaction: {
            intersect: false,
            mode: 'nearest',
          },
          animation: false,
          maintainAspectRatio: false,
        },
      });

      // Fake real-time
      // For demo purposes only!
      const chartValue = document.getElementById('dashboard-card-05-value');
      const chartDeviation = document.getElementById('dashboard-card-05-deviation');

      const adddata = (value = NaN, prev) => {
        const { datasets } = chart.data;
        chart.data.labels.shift();
        chart.data.labels.push(new Date());
        datasets[0].data.shift();
        datasets[0].data.push(value);
        chart.update(0);
        if (!chartValue) return;
        const diff = ((value - prev) / prev) * 100;
        chartValue.innerHTML = value;
        if (!chartDeviation) return;
        if (diff < 0) {
          chartDeviation.style.backgroundColor = tailwindConfig().theme.colors.amber[500];
        } else {
          chartDeviation.style.backgroundColor = tailwindConfig().theme.colors.emerald[500];
        }
        chartDeviation.innerHTML = `${diff > 0 ? '+' : ''}${diff.toFixed(2)}%`;
      };

      const reload = () => {
        increment += 1;
        if (increment + range - 1 < result.data.length) {
          adddata(result.data[increment + range - 1], result.data[increment + range - 2]);
        } else {
          increment = 0;
          range = 1;
          adddata(result.data[increment + range - 1], result.data[result.data.length - 1]);
        }
        setTimeout(reload, 2000);
      };

      reload();
    });


};

export default dashboardCard05;
