function Money() {
    let voe = document.getElementById('voe').value;
    let percentage = 20/100;

    let VAT = percentage * voe;
    let amount = VAT + parseInt(voe);

    let vat = document.getElementById('vat');
    vat.value = VAT;

    let amountInEuro = document.getElementById('amount_euro');
    amountInEuro.value = Math.floor(amount);

    let amountInEuros = document.getElementById('amount_euros');
    amountInEuros.value = Math.floor(amount);

    let xhr = new XMLHttpRequest();
    xhr.open(
        'GET',
        'http://data.fixer.io/api/latest?access_key=4e85812a1ae88537761694fe399c8229&format=1',
        true
    );
    xhr.onload = function () {
        if(this.status == 200) {
            let euro = document.getElementById('amount_euro').value;
            let amountInPound = document.getElementById('amount_pound');
            let amountInPounds = document.getElementById('amount_pounds');

            let result = JSON.parse(this.responseText);
            let convertToPound = euro * result.rates.GBP;

            amountInPound.value = Math.floor(convertToPound);
            amountInPounds.value = Math.floor(convertToPound);
        }
    }
    xhr.send();
}