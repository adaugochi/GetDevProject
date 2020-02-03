<template>
    <!--Add Modal -->
    <div class="modal fade" :id="modalId" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="title"></slot>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <slot name="body"></slot>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'ModalComponent',
        props: ['modalId']
    }
</script>