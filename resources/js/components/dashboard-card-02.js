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
const dashboardCard02 = () => {
  const ctx = document.getElementById('dashboard-card-02');
  if (!ctx) return;

  fetch('/json-data-feed?datatype=2')
    .then(a => {
      return a.json();
    })
    .then(result => {

      const dataset1 = result.data.slice(0, 26);
      const dataset2 = result.data.slice(26, 52);

      const chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: result.labels,
          datasets: [
            // Indigo line
            {
              data: dataset1,
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
            // Gray line
            {
              data: dataset2,
              borderColor: tailwindConfig().theme.colors.slate[300],
              borderWidth: 2,
              tension: 0,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: tailwindConfig().theme.colors.slate[300],
              clip: 20,
            },
          ],
        },
        options: {
          chartArea: {
            backgroundColor: tailwindConfig().theme.colors.slate[50],
          },
          layout: {
            padding: 20,
          },
          scales: {
            y: {
              display: false,
              beginAtZero: true,
            },
            x: {
              type: 'time',
              time: {
                parser: 'MM-DD-YYYY',
                unit: 'month',
              },
              display: false,
            },
          },
          plugins: {
            tooltip: {
              callbacks: {
                title: () => false, // Disable tooltip title
                label: (context) => formatValue(context.parsed.y),
              },
            },
            legend: {
              display: false,
            },
          },
          interaction: {
            intersect: false,
            mode: 'nearest',
          },
          maintainAspectRatio: false,
        },
      });
    });
};

export default dashboardCard02;
