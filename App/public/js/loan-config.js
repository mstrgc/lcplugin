function send_request(){
  const form = document.getElementById('lcp-form');
  const form_data = new FormData(form);

  form_data.append('bank', lcp.bank);

  fetch(lcp.rest_url, {
    method: 'POST',
    headers: {'Content-Type': 'application/json', 'X-WP-Nonce': lcp.nonce},
    body: JSON.stringify(Object.fromEntries(form_data))
  })
  .then(res => res.json())
  .then(data => {
    data.forEach(row => {
      document.getElementById(row['name'] + '-result').textContent = (row['value']).to_price();
    });
  });
}

//convert form numbers to persian
function convert_numbers(){
  numbers = document.getElementById('lcp-form').querySelectorAll('.input-number-label');
  numbers.forEach(num => {
    num.textContent = num.textContent.to_price();
  });
}

//display input range value in input label
function display_range(){
  const ranges = document.getElementById('lcp-form').querySelectorAll('input[type="range"]');
  ranges.forEach(range => {
      document.getElementById(range.name + '-index').textContent = (range.value).to_price();
  })
}

document.addEventListener('DOMContentLoaded', () => {
  send_request();
  convert_numbers();
  display_range();
});
document.getElementById('lcp-form').addEventListener('change', send_request);
document.getElementById('lcp-form').addEventListener('input', display_range);