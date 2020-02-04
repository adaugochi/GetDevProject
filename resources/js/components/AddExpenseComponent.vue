<template>
    <ModalComponent :modal-id="modalAdd">
        <template v-slot:title>
            <h3>Add New Expense</h3>
        </template>
        <template v-slot:body>
            <form role="form" method="post" action="/expense">
                <input type="hidden" name="_token" v-model="csrfToken">
                <input type="hidden" name="user_id" v-model="userId">
                <FormComponent></FormComponent>
            </form>
        </template>
    </ModalComponent>
</template>

<script>
    import ModalComponent from "./ModalComponent";
    import FormComponent from "./FormComponent";

    export default {
        components: {FormComponent, ModalComponent},
        props: {
            userId: Number,
            csrfToken: String
        },
        data() {
            return {
                modalAdd: "modalAdd"
            }
        }
    }
</script>