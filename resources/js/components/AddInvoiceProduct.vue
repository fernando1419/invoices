<template>
   <div>
      <button type="button" class="btn btn-success btn-sm float-left mt-3" @click="addItem"> Add InvoiceItem... </button>
   </div>
</template>

<script>
export default {
   methods: {
      addItem() {
         this.$emit('addInvoiceItem')
      }
   }
}
</script>
