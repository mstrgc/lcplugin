function send_request(){
  const form = document.getElementById('loan-form');
  const form_data = new FormData(form);
  fetch('/word/wp-json/loan-calculator/v1/calculate', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(Object.fromEntries(form_data))
  })
  .then(res => res.json())
  .then(data => {
    console.log('Monthly payment:', data.deposit);
  });
}

document.getElementById('loan-form').addEventListener('change', send_request);