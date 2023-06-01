// Import Chart.js
import {
  Chart, DoughnutController, ArcElement, TimeScale, Tooltip,
} from 'chart.js';
import 'chartjs-adapter-moment';

// Import utilities
import { tailwindConfig } from '../utils';

Chart.register(DoughnutController, ArcElement, TimeScale, Tooltip);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard06 = () => {
  const ctx = document.getElementById('dashboard-card-06');
  if (!ctx) return;

  const darkMode = localStorage.getItem('dark-mode') === 'true';

  const tooltipTitleColor = {
    light: '#1e293b',
    dark: '#f1f5f9'
  };

  const tooltipBodyColor = {
    light: '#1e293b',
    dark: '#f1f5f9'
  };

  const tooltipBgColor = {
    light: '#ffffff',
    dark: '#334155'
  };

  const tooltipBorderColor = {
    light: '#e2e8f0',
    dark: '#475569'
  };

  fetch('/json-data-feed?datatype=6')
    .then(a => {
      return a.json();
    })
    .then(result => {
      const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: result.labels,
          datasets: [
            {
              label: 'Top Countries',
              data: result.data,
              backgroundColor: [
                tailwindConfig().theme.colors.indigo[500],
                tailwindConfig().theme.colors.blue[400],
                tailwindConfig().theme.colors.indigo[800],
              ],
              hoverBackgroundColor: [
                tailwindConfig().theme.colors.indigo[600],
                tailwindConfig().theme.colors.blue[500],
                tailwindConfig().theme.colors.indigo[900],
              ],
              borderWidth: 0,
            },
          ],
        },
        options: {
          cutout: '80%',
          layout: {
            padding: 24,
          },
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              titleColor: darkMode ? tooltipTitleColor.dark : tooltipTitleColor.light,
              bodyColor: darkMode ? tooltipBodyColor.dark : tooltipBodyColor.light,
              backgroundColor: darkMode ? tooltipBgColor.dark : tooltipBgColor.light,
              borderColor: darkMode ? tooltipBorderColor.dark : tooltipBorderColor.light,
            },
            htmlLegend: {
              // ID of the container to put the legend in
              containerID: 'dashboard-card-06-legend',
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
            items.forEach((item) => {
              const li = document.createElement('li');
              li.style.margin = tailwindConfig().theme.margin[1];
              // Button element
              const button = document.createElement('button');
              button.classList.add('btn-xs', 'bg-white', 'dark:bg-slate-800', 'text-slate-500', 'dark:text-slate-400', 'border', 'border-slate-200', 'dark:border-slate-700', 'shadow-md');
              button.style.opacity = item.hidden ? '.3' : '';
              button.onclick = () => {
                c.toggleDataVisibility(item.index, !item.index);
                c.update();
              };
              // Color box
              const box = document.createElement('span');
              box.style.display = 'block';
              box.style.width = tailwindConfig().theme.width[2];
              box.style.height = tailwindConfig().theme.height[2];
              box.style.backgroundColor = item.fillStyle;
              box.style.borderRadius = tailwindConfig().theme.borderRadius.sm;
              box.style.marginRight = tailwindConfig().theme.margin[1];
              box.style.pointerEvents = 'none';
              // Label
              const label = document.createElement('span');
              label.style.display = 'flex';
              label.style.alignItems = 'center';
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

      document.addEventListener('darkMode', (e) => {
        const { mode } = e.detail;
        if (mode === 'on') {
          chart.options.plugins.tooltip.titleColor = tooltipTitleColor.dark;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
          chart.options.plugins.tooltip.titleColor = tooltipTitleColor.light;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
        }
        chart.update('none');
      });
    });
};

export default dashboardCard06;
