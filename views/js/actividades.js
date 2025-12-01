document.addEventListener('DOMContentLoaded', function () {
  const loader = document.getElementById('loader');
  const tableContainer = document.getElementById('table-container');
  const table = document.getElementById('actividades-table');
  const alertBox = document.getElementById('alert');

  function showAlert(message, type = 'danger'){
    alertBox.className = `alert alert-${type}`;
    alertBox.textContent = message;
    alertBox.classList.remove('d-none');
  }

  function hideAlert(){
    alertBox.classList.add('d-none');
  }

  function buildTable(data){
    table.innerHTML = '';

    if (!Array.isArray(data) || data.length === 0) {
      showAlert('No hay actividades para mostrar.', 'info');
      tableContainer.style.display = 'none';
      return;
    }

    hideAlert();
    tableContainer.style.display = 'block';

    // Cabeceras: usar las llaves del primer objeto
    const keys = Object.keys(data[0]);
    const thead = document.createElement('thead');
    const trHead = document.createElement('tr');
    keys.forEach(k => {
      const th = document.createElement('th');
      th.textContent = k.replace(/_/g, ' ').toUpperCase();
      trHead.appendChild(th);
    });
    thead.appendChild(trHead);
    table.appendChild(thead);

    const tbody = document.createElement('tbody');
    data.forEach(row => {
      const tr = document.createElement('tr');
      keys.forEach(k => {
        const td = document.createElement('td');
        if (k === 'Estado') {
          console.log(row[k]);
          td.textContent = row[k] === '1' ? 'Completado' : 'Error';
        } else {
          td.textContent = row[k];
        }
        tr.appendChild(td);
      });
      tbody.appendChild(tr);
    });

    table.appendChild(tbody);
  }

  function appendRows(newRows){
    if (!Array.isArray(newRows) || newRows.length === 0) return;

    // Obtener o crear tbody
    let tbody = table.querySelector('tbody');
    if (!tbody) {
      tbody = document.createElement('tbody');
      table.appendChild(tbody);
    }

    const keys = Object.keys(newRows[0]);

    newRows.forEach(row => {
      const tr = document.createElement('tr');
      keys.forEach(k => {
        const td = document.createElement('td');
        if (k === 'Estado') {
          td.textContent = row[k] === '1' ? 'Completado' : 'Error';
        } else {
          td.textContent = row[k];
        }
        tr.appendChild(td);
      });
      tbody.appendChild(tr);
    });
  }

  let CANTIDAD_DATOS = 0;

  async function fetchActividades(){
    hideAlert();

    try{
      const form = new FormData();
      form.append('operacion', 'listar_actividades');

      const resp = await fetch('../../controllers/actividad.controller.php', {
        method: 'POST',
        body: form
      });

      if (!resp.ok) throw new Error('Error en la respuesta del servidor');

      const data = await resp.json();
      if (data.length === 0) {
        
      }

      if (CANTIDAD_DATOS === 0) {
        buildTable(data);
        CANTIDAD_DATOS = data.length;
        return;
      }

      if (data.length > CANTIDAD_DATOS) {
        const newRows = data.slice(CANTIDAD_DATOS);
        appendRows(newRows);
        CANTIDAD_DATOS = data.length;
      } 

    } catch (err) {
      console.error(err);
      showAlert('No se pudieron cargar las actividades. Revisa la consola.', 'danger');
    } finally {
      loader.style.display = 'none';
    }
  }

  setInterval(fetchActividades, 5000);

  fetchActividades();
});
