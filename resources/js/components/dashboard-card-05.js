// Import Chart.js
import {
  Chart, LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip,
} from 'chart.js';
import 'chartjs-adapter-moment';
import { chartAreaGradient } from '../app';

// Import utilities
import { formatValue, getCssVariable, adjustColorOpacity } from '../utils';

Chart.register(LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard05 = () => {
  const ctx = document.getElementById('dashboard-card-05');
  if (!ctx) return;

  const darkMode = localStorage.getItem('dark-mode') === 'true';

  const textColor = {
    light: '#9CA3AF',
    dark: '#6B7280'
  };

  const gridColor = {
    light: '#F3F4F6',
    dark: adjustColorOpacity('#374151', 0.6)
  };

  const tooltipTitleColor = {
    light: '#1F2937',
    dark: '#F3F4F6'
  };

  const tooltipBodyColor = {
    light: '#6B7280',
    dark: '#9CA3AF'
  };

  const tooltipBgColor = {
    light: '#ffffff',
    dark: '#374151'
  };

  const tooltipBorderColor = {
    light: '#E5E7EB',
    dark: '#4B5563'
  };    

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
              backgroundColor: function(context) {
                const chart = context.chart;
                const {ctx, chartArea} = chart;
                return chartAreaGradient(ctx, chartArea, [
                  { stop: 0, color: adjustColorOpacity(getCssVariable('--color-violet-500'), 0) },
                  { stop: 1, color: adjustColorOpacity(getCssVariable('--color-violet-500'), 0.2) }
                ]);
              },
              borderColor: getCssVariable('--color-violet-500'),
              borderWidth: 2,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: getCssVariable('--color-violet-500'),
              pointHoverBackgroundColor: getCssVariable('--color-violet-500'),
              pointBorderWidth: 0,
              pointHoverBorderWidth: 0,
              clip: 20,
              tension: 0.2
            },
          ],
        },
        options: {
          layout: {
            padding: 20,
          },
          scales: {
            y: {
              border: {
                display: false,
              },
              suggestedMin: 30,
              suggestedMax: 80,
              ticks: {
                maxTicksLimit: 5,
                callback: (value) => formatValue(value),
                color: darkMode ? textColor.dark : textColor.light,
              },
              grid: {
                color: darkMode ? gridColor.dark : gridColor.light,
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
              border: {
                display: false,
              },              
              grid: {
                display: false,
              },
              ticks: {
                autoSkipPadding: 48,
                maxRotation: 0,
                color: darkMode ? textColor.dark : textColor.light,
              },
            },
          },
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              titleFont: {
                weight: 600,
              },
              callbacks: {
                label: (context) => formatValue(context.parsed.y),
              },
              titleColor: darkMode ? tooltipTitleColor.dark : tooltipTitleColor.light,
              bodyColor: darkMode ? tooltipBodyColor.dark : tooltipBodyColor.light,
              backgroundColor: darkMode ? tooltipBgColor.dark : tooltipBgColor.light,
              borderColor: darkMode ? tooltipBorderColor.dark : tooltipBorderColor.light,                 
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
          chartDeviation.style.backgroundColor = adjustColorOpacity(getCssVariable('--color-red-500'), 0.2);
          chartDeviation.style.color = getCssVariable('--color-red-700');
        } else {
          chartDeviation.style.backgroundColor = adjustColorOpacity(getCssVariable('--color-green-500'), 0.2);
          chartDeviation.style.color = getCssVariable('--color-green-700');
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

      document.addEventListener('darkMode', (e) => {
        const { mode } = e.detail;
        if (mode === 'on') {
          chart.options.scales.x.ticks.color = textColor.dark;
          chart.options.scales.y.ticks.color = textColor.dark;
          chart.options.scales.y.grid.color = gridColor.dark;
          chart.options.plugins.tooltip.titleColor = tooltipTitleColor.dark;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
          chart.options.scales.x.ticks.color = textColor.light;
          chart.options.scales.y.ticks.color = textColor.light;
          chart.options.scales.y.grid.color = gridColor.light;
          chart.options.plugins.tooltip.titleColor = tooltipTitleColor.light;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
        }
        chart.update('none');
      });        
    });
};

export default dashboardCard05;
