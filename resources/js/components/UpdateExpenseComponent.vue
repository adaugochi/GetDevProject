<template>
    <ModalComponent :modal-id="modalEdit">
        <template v-slot:title>
            <h3>Edit Expense</h3>
        </template>
        <template v-slot:body>
            <form role="form" method="post" action="/expense">
                <input type="hidden" name="_token" v-model="csrfToken">
                <input type="hidden" name="user_id" v-model="userId">
                <FormComponent :each-data="eachData" :is-edit="true"></FormComponent>
            </form>
        </template>
    </ModalComponent>
</template>
<script>
    import ModalComponent from "./ModalComponent";
    import FormComponent from "./FormComponent";
    import { EventBus } from '../src/event';

    export default {
        components: {FormComponent, ModalComponent},
        data() {
            return {
                //isEdit: true,
                modalEdit: "modalEdit",
                userId: null,
                csrfToken: null,
                eachData: null
            }
        },
        mounted() {
            EventBus.$on('updateDetails', (details) => {
                this.userId = details.userId;
                this.csrfToken = details.csrfToken;
                this.eachData = details.eachData
            })
        }
    }
</script>