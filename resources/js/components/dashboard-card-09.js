// Import Chart.js
import {
  Chart, BarController, BarElement, LinearScale, TimeScale, Tooltip, Legend,
} from 'chart.js';

// Import utilities
import { tailwindConfig, formatValue, hexToRGB } from '../utils';

Chart.register(BarController, BarElement, LinearScale, TimeScale, Tooltip, Legend);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard09 = () => {
  const ctx = document.getElementById('dashboard-card-09');
  if (!ctx) return;

  const darkMode = localStorage.getItem('dark-mode') === 'true';

  const textColor = {
    light: '#9CA3AF',
    dark: '#6B7280'
  };

  const gridColor = {
    light: '#F3F4F6',
    dark: `rgba(${hexToRGB('#374151')}, 0.6)`
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
              backgroundColor: tailwindConfig().theme.colors.violet[500],
              hoverBackgroundColor: tailwindConfig().theme.colors.violet[600],
              barPercentage: 0.7,
              categoryPercentage: 0.7,
              borderRadius: 4,
            },
            // Blue bars
            {
              label: 'Stack 2',
              data: dataset2,
              backgroundColor: tailwindConfig().theme.colors.violet[200],
              hoverBackgroundColor: tailwindConfig().theme.colors.violet[300],
              barPercentage: 0.7,
              categoryPercentage: 0.7,
              borderRadius: 4,
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
              border: {
                display: false,
              },
              beginAtZero: true,
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
              stacked: true,
              type: 'time',
              time: {
                parser: 'MM-DD-YYYY',
                unit: 'month',
                displayFormats: {
                  month: 'MMM YY',
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
              callbacks: {
                title: () => false, // Disable tooltip title
                label: (context) => formatValue(context.parsed.y),
              },
              bodyColor: darkMode ? tooltipBodyColor.dark : tooltipBodyColor.light,
              backgroundColor: darkMode ? tooltipBgColor.dark : tooltipBgColor.light,
              borderColor: darkMode ? tooltipBorderColor.dark : tooltipBorderColor.light,    
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
      
      document.addEventListener('darkMode', (e) => {
        const { mode } = e.detail;
        if (mode === 'on') {
          chart.options.scales.x.ticks.color = textColor.dark;
          chart.options.scales.y.ticks.color = textColor.dark;
          chart.options.scales.y.grid.color = gridColor.dark;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
          chart.options.scales.x.ticks.color = textColor.light;
          chart.options.scales.y.ticks.color = textColor.light;
          chart.options.scales.y.grid.color = gridColor.light;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
        }
        chart.update('none');
      });      
    });
};

export default dashboardCard09;
