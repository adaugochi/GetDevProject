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
                <td>
                    <button class="btn btn-sm btn-primary"
                            data-toggle="modal" data-target="#modalEdit"
                            @click="updateDetails(index)">
                        Edit
                    </button>
                </td>
            </tr>
            <UpdateExpenseComponent></UpdateExpenseComponent>
            </tbody>
        </table>
    </div>
</template>

<script>
    import UpdateExpenseComponent from "./UpdateExpenseComponent";
    import { EventBus } from '../src/event';

    export default {
        components: {UpdateExpenseComponent},
        props: ['expenses', 'userId', 'csrfToken'],
        data() {
            return {
                results: this.expenses,
                fields: ['S/N', 'Date of Expense', 'VAT', 'Amount (EUR)', 'Reason for Expense', 'action'],
            }
        },
        methods: {
            convertToReadableDataTIme(time) {
                let date = new Date(time);
                return date.toDateString() + " " +  date.toLocaleTimeString();
            },
            updateDetails(index) {
                EventBus.$emit(
                    'updateDetails',
                    {'userId': this.userId, 'csrfToken': this.csrfToken, 'eachData': this.results[index]
                })
            }
        }
    }
</script>
