function send_request(){
  const form = document.getElementById('loan-form');
  const form_data = new FormData(form);

  form_data.append('bank', lcp.bank);

  fetch(lcp.rest_url, {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(Object.fromEntries(form_data))
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById('loan-result').innerHTML = data;
  });
}

document.getElementById('loan-form').addEventListener('change', send_request);