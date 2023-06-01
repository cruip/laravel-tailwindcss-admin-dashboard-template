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

  const darkMode = localStorage.getItem('dark-mode') === 'true';

  const chartAreaBg = {
    light: '#f8fafc',
    dark: `rgba(${hexToRGB('#0F172A')}, 0.24)`
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
              pointHoverBackgroundColor: tailwindConfig().theme.colors.indigo[500],
              pointBorderWidth: 0,
              pointHoverBorderWidth: 0,
              clip: 20,
            },
            // Gray line
            {
              data: dataset2,
              borderColor: `rgba(${hexToRGB(tailwindConfig().theme.colors.slate[500])}, 0.25)`,
              borderWidth: 2,
              tension: 0,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: `rgba(${hexToRGB(tailwindConfig().theme.colors.slate[500])}, 0.25)`,
              pointHoverBackgroundColor: `rgba(${hexToRGB(tailwindConfig().theme.colors.slate[500])}, 0.25)`,
              pointBorderWidth: 0,
              pointHoverBorderWidth: 0,
              clip: 20,
            },
          ],
        },
        options: {
          chartArea: {
            backgroundColor: darkMode ? chartAreaBg.dark : chartAreaBg.light,
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
              bodyColor: darkMode ? tooltipBodyColor.dark : tooltipBodyColor.light,
              backgroundColor: darkMode ? tooltipBgColor.dark : tooltipBgColor.light,
              borderColor: darkMode ? tooltipBorderColor.dark : tooltipBorderColor.light,    
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
      
      document.addEventListener('darkMode', (e) => {
        const { mode } = e.detail;
        if (mode === 'on') {
          chart.options.chartArea.backgroundColor = chartAreaBg.dark;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
          chart.options.chartArea.backgroundColor = chartAreaBg.light;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
        }
        chart.update('none');
      });      
    });
};

export default dashboardCard02;
