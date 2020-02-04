<template>
    <div>
        <div class="form-group">
            <label class="small font-weight-bold">Value of Product</label>
            <input type="number" name="value_of_product"
                   class="form-control form-control-sm"
                   v-model="formData.vop" @keyup="calculateExchangeRate">
        </div>

        <div class="form-group">
            <label class="small font-weight-bold">Date of Expense</label>
            <input type="datetime-local" name="date_of_expense" class="form-control form-control-sm" v-model="formData.date">
        </div>

        <div class="form-group">
            <label class="small font-weight-bold">Amount (EUR)</label>
            <input type="text" class="form-control form-control-sm" v-model="formData.amt_eur" disabled>
        </div>

        <div class="form-group">
            <label class="small font-weight-bold">Amount (POUNDS)</label>
            <input type="text" class="form-control form-control-sm" v-model="formData.amt_pound" disabled>
        </div>

        <div class="form-group">
            <label class="small font-weight-bold">Reason of Expense</label>
            <textarea class="form-control" rows="3" name="reason" v-model="formData.reason"></textarea>
        </div>

        <input type="hidden" name="amount_pound" v-model="getAmountInPound">
        <input type="hidden" name="amount_euro" v-model="getAmountInEuro">
        <input type="hidden" name="vat" v-model="getVat">

        <button type="submit" class="btn">Save</button>
    </div>
</template>

<script>

    export default {
        name: 'FormComponent',
        mounted() {
            fetch('http://data.fixer.io/api/latest?access_key=4e85812a1ae88537761694fe399c8229&format=1', {
                method: 'get'
            }).then((response) => {
                return response.json()
            }).then((data) => {
                this.exchangeRates = data.rates
            });
        },
        data() {
            return {
                formData: {
                    vop: 0,
                    amt_eur: 0,
                    amt_pound: 0,
                    vat: 0,
                    date: null,
                    reason: ''
                },
                exchangeRates: [],
            }
        },
        computed: {
            getVat() {
                return parseFloat(this.formData.vat).toFixed(2);
            },
            getAmountInEuro() {
                return parseFloat(this.formData.amt_eur).toFixed(2);
            },
            getAmountInPound() {
                return parseFloat(this.formData.amt_pound).toFixed(2);
            }
        },
        methods: {
            calculateExchangeRate() {
                if (this.formData.vop !== "") {
                    let percent = 0.02;
                    this.formData.vat = this.formData.vop * percent;
                    this.formData.amt_eur = this.formData.vat + parseFloat(this.formData.vop);
                    this.formData.amt_pound = this.formData.amt_eur * this.exchangeRates.GBP;
                } else {
                    this.formData.vat = 0;
                    this.formData.amt_eur = 0;
                    this.formData.amt_pound = 0;
                }
            }
        }
    }
</script>