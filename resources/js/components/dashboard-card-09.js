// Import Chart.js
import {
  Chart, BarController, BarElement, LinearScale, TimeScale, Tooltip, Legend,
} from 'chart.js';

// Import utilities
import { tailwindConfig, formatValue } from '../utils';

Chart.register(BarController, BarElement, LinearScale, TimeScale, Tooltip, Legend);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard09 = () => {
  const ctx = document.getElementById('dashboard-card-09');
  if (!ctx) return;

  fetch('/json-data-feed?datatype=9')
    .then(a => {
      return a.json();
    })
    .then(result => {

      const dataset1 = result.data.splice(0, 6);
      const dataset2 = result.data;

      const chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: result.labels,
          datasets: [
            // Light blue bars
            {
              label: 'Stack 1',
              data: dataset1,
              backgroundColor: tailwindConfig().theme.colors.indigo[500],
              hoverBackgroundColor: tailwindConfig().theme.colors.indigo[600],
              barPercentage: 0.66,
              categoryPercentage: 0.66,
            },
            // Blue bars
            {
              label: 'Stack 2',
              data: dataset2,
              backgroundColor: tailwindConfig().theme.colors.indigo[200],
              hoverBackgroundColor: tailwindConfig().theme.colors.indigo[300],
              barPercentage: 0.66,
              categoryPercentage: 0.66,
            },
          ],
        },
        options: {
          layout: {
            padding: {
              top: 12,
              bottom: 16,
              left: 20,
              right: 20,
            },
          },
          scales: {
            y: {
              stacked: true,
              grid: {
                drawBorder: false,
              },
              beginAtZero: true,
              ticks: {
                maxTicksLimit: 5,
                callback: (value) => formatValue(value),
              },
            },
            x: {
              stacked: true,
              type: 'time',
              time: {
                parser: 'MM-DD-YYYY',
                unit: 'month',
                displayFormats: {
                  month: 'MMM YY',
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
              callbacks: {
                title: () => false, // Disable tooltip title
                label: (context) => formatValue(context.parsed.y),
              },
            },
          },
          interaction: {
            intersect: false,
            mode: 'nearest',
          },
          animation: {
            duration: 200,
          },
          maintainAspectRatio: false,
        },
      });
    });
};

export default dashboardCard09;
