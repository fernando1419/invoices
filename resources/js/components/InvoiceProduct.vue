<template>
   <tr>
      <td class="table-name" :class="{'is-invalid': formErrors['products.' + productIndex + '.product_id']}">
         <input type="text" class="form-control form-control-sm" v-model.trim="formInvoice.name" placeholder="Product" readonly>
      </td>
      <td class="table-name" :class="{'is-invalid': formErrors['products.' + productIndex + '.unit_price']}">
         <input type="number" class="form-control form-control-sm" v-model="formInvoice.unit_price" placeholder="unit_price" readonly>
      </td>
      <td class="table-name" :class="{'is-invalid': formErrors['products.' + productIndex + '.quantity']}">
         <input type="number" min="1" class="form-control form-control-sm" v-model="formInvoice.quantity" placeholder="Quantity" readonly>
      </td>
      <td class="table-name">
         $ {{ formInvoice.quantity * formInvoice.unit_price | currency }}
      </td>
      <td class="table-name">
         <button type="button" class="btn btn-danger btn-sm" @click="onDelete"> X </button>
      </td>
   </tr>
</template>

<script>
export default {
   props: ['formInvoice', 'allSelectedProducts', 'formErrors', 'productIndex'],
   data() {
      return {
         // unit_price: 0,
         // quantity: 1,
      }
   },
   methods: {
      onDelete: function() {
         this.$emit('delete')
      }
   },
  filters: {
     currency(value) {
        return value.toFixed(2);
     }
  }
}
</script>
