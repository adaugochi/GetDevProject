<template>
    <div class="col-12 mx-auto">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th v-for="(field, index) in fields" :key="index">
                    {{ field }}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(result, index) in results" :key="index">
                <td>{{ index+1 }}</td>
                <td>{{ convertToReadableDataTIme(result.date_of_expenses)}}</td>
                <td>{{ result.VAT }}</td>
                <td>{{ result.amount_in_euro }}</td>
                <td>{{ result.reason_for_expenses }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['expenses'],
        data() {
            return {
                results: this.expenses,
                fields: ['S/N', 'Date of Expense', 'VAT', 'Amount (EUR)', 'Reason for Expense'],
            }
        },
        methods: {
            convertToReadableDataTIme(time) {
                let date = new Date(time);
                return date.toDateString() + " " +  date.toLocaleTimeString();
            }
        }
    }
</script>
