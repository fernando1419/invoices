<template>
   <div class="row">
      <div class="col-5">
         <input type="text" class="form-control form-control-sm" v-model.trim="formInvoice.name" placeholder="Product" readonly
                  :class="{'is-invalid': formErrors['products.' + productIndex + '.product_id']}">
      </div>

      <div class="col-2">
         <input type="number" class="form-control form-control-sm" v-model="formInvoice.unit_price" placeholder="unit_price" readonly>
         <!-- <input type="number" class="form-control form-control-sm" name="unit_price" v-model.number="unit_price" placeholder="unit_price" readonly
               :class="{'is-invalid': formErrors['products.' + productIndex + '.unit_price']}"> -->
      </div>

      <div class="col-1">
         <input type="number" min="1" class="form-control form-control-sm" v-model="formInvoice.quantity" placeholder="Quantity" readonly>
         <!-- <input type="number" min="1" class="form-control form-control-sm" name="quantity" v-model.number="quantity" placeholder="Quantity" readonly
                  :class="{'is-invalid': formErrors['products.' + productIndex + '.quantity']}"> -->
      </div>

      <div class="col-2">
         <p>$ {{ formInvoice.quantity * formInvoice.unit_price | currency }}</p>
      </div>

      <div class="col-1">
         <button type="button" class="btn btn-danger btn-sm" @click="onDelete"> X </button>
      </div>
   </div>

</template>

<script>
export default {
   props: ['formInvoice', 'allSelectedProducts', 'formErrors', 'productIndex'],
   data() {
      return {
         unit_price: 0,
         quantity: 1,
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
