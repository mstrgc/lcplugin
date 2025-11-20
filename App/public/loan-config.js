function send_request(){
  const form = document.getElementById('lcp-form');
  const form_data = new FormData(form);

  form_data.append('bank', lcp.bank);

  fetch(lcp.rest_url, {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(Object.fromEntries(form_data))
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById('lcp-result').innerHTML = '';
    data.forEach(row => {
      document.getElementById('lcp-result').innerHTML += "<div class='lcp-result-row'><p>" + row['label'] + "</p><p><span id='" + row['name'] + "_result'>" + row['value'] + "</span> " + row['suffix'] + "</p></div><hr></hr>";
    });
  });
}

document.addEventListener('DOMContentLoaded', send_request);
document.getElementById('lcp-form').addEventListener('change', send_request);