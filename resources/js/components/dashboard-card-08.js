// Import Chart.js
import {
  Chart, LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip,
} from 'chart.js';

// Import utilities
import { tailwindConfig, formatValue } from '../utils';

Chart.register(LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard08 = () => {
  const ctx = document.getElementById('dashboard-card-08');
  if (!ctx) return;

  fetch('/json-data-feed?datatype=8')
    .then(a => {
      return a.json();
    })
    .then(result => {

      const dataset1 = result.data.splice(0, 26);
      const dataset2 = result.data.splice(0, 26);
      const dataset3 = result.data;

      const chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: result.labels,
          // labels: [
          //     '12-01-2020', '01-01-2021', '02-01-2021',
          //     '03-01-2021', '04-01-2021', '05-01-2021',
          //     '06-01-2021', '07-01-2021', '08-01-2021',
          //     '09-01-2021', '10-01-2021', '11-01-2021',
          //     '12-01-2021', '01-01-2022', '02-01-2022',
          //     '03-01-2022', '04-01-2022', '05-01-2022',
          //     '06-01-2022', '07-01-2022', '08-01-2022',
          //     '09-01-2022', '10-01-2022', '11-01-2022',
          //     '12-01-2022', '01-01-2023',
          // ],
          datasets: [
            // Indigo line
            {
              label: 'Current',
              data: dataset1,
              borderColor: tailwindConfig().theme.colors.indigo[500],
              fill: false,
              borderWidth: 2,
              tension: 0,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: tailwindConfig().theme.colors.indigo[500],
              clip: 20,
            },
            // Blue line
            {
              label: 'Previous',
              data: dataset2,
              borderColor: tailwindConfig().theme.colors.blue[400],
              fill: false,
              borderWidth: 2,
              tension: 0,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: tailwindConfig().theme.colors.blue[400],
              clip: 20,
            },
            // emerald line
            {
              label: 'Average',
              data: dataset3,
              borderColor: tailwindConfig().theme.colors.emerald[500],
              fill: false,
              borderWidth: 2,
              tension: 0,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: tailwindConfig().theme.colors.emerald[500],
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
              beginAtZero: true,
              grid: {
                drawBorder: false,
              },
              ticks: {
                maxTicksLimit: 5,
                callback: (value) => formatValue(value),
              },
            },
            x: {
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
            htmlLegend: {
              // ID of the container to put the legend in
              containerID: 'dashboard-card-08-legend',
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
          maintainAspectRatio: false,
        },
        plugins: [{
          id: 'htmlLegend',
          afterUpdate(c, args, options) {
            const legendContainer = document.getElementById(options.containerID);
            const ul = legendContainer.querySelector('ul');
            if (!ul) return;
            // Remove old legend items
            while (ul.firstChild) {
              ul.firstChild.remove();
            }
            // Reuse the built-in legendItems generator
            const items = c.options.plugins.legend.labels.generateLabels(c);
            items.slice(0, 2).forEach((item) => {
              const li = document.createElement('li');
              li.style.marginLeft = tailwindConfig().theme.margin[3];
              // Button element
              const button = document.createElement('button');
              button.style.display = 'inline-flex';
              button.style.alignItems = 'center';
              button.style.opacity = item.hidden ? '.3' : '';
              button.onclick = () => {
                c.setDatasetVisibility(item.datasetIndex, !c.isDatasetVisible(item.datasetIndex));
                c.update();
              };
              // Color box
              const box = document.createElement('span');
              box.style.display = 'block';
              box.style.width = tailwindConfig().theme.width[3];
              box.style.height = tailwindConfig().theme.height[3];
              box.style.borderRadius = tailwindConfig().theme.borderRadius.full;
              box.style.marginRight = tailwindConfig().theme.margin[2];
              box.style.borderWidth = '3px';
              box.style.borderColor = c.data.datasets[item.datasetIndex].borderColor;
              box.style.pointerEvents = 'none';
              // Label
              const label = document.createElement('span');
              label.style.color = tailwindConfig().theme.colors.slate[500];
              label.style.fontSize = tailwindConfig().theme.fontSize.sm[0];
              label.style.lineHeight = tailwindConfig().theme.fontSize.sm[1].lineHeight;
              const labelText = document.createTextNode(item.text);
              label.appendChild(labelText);
              li.appendChild(button);
              button.appendChild(box);
              button.appendChild(label);
              ul.appendChild(li);
            });
          },
        }],
      });
    });
};

export default dashboardCard08;
