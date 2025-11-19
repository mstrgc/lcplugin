function send_request(){
  const form = document.getElementById('loan-form');
  const form_data = new FormData(form);

  form_data.append('bank', 'melli');

  fetch('/word/wp-json/loan-calculator/v1/calculate', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(Object.fromEntries(form_data))
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById('loan-result').innerHTML = data;
  });
}

function get_form(){
  fetch('/word/wp-json/loan-calculator/v1/get-form', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({'bank': 'melli'})
  })
  .then(res => res.json())
  .then(form => {
    form.forEach(row => {
      document.getElementById('loan-result').innerHTML += row;
    });
  });
}

document.addEventListener('DOMContentLoaded', get_form);
document.getElementById('loan-form').addEventListener('change', send_request);