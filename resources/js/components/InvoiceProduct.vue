<template>
   <div class="row">

      <div class="col-12 form-row">

            <div class="col-5">
               <!-- <select name="product_array[]" class="form-control form-control-sm" v-model="selected">
                  <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name + " " + product.unit_price }}</option>
               </select> -->
               <!-- <input type="text" class="form-control form-control-sm" name="product[]" v-model="formInvoice.name" placeholder="product"> -->
               <input type="text" class="form-control form-control-sm" name="product_id" v-model.number="formInvoice.product_id" placeholder="Product"
                      :class="{'is-invalid': formErrors['products.' + productIndex + '.product_id']}">
            </div>

            <div class="col-2">
               <!-- <input type="number" class="form-control form-control-sm" name="unit_price[]" v-model="formInvoice.unit_price" placeholder="unit_price"> -->
               <input type="number" class="form-control form-control-sm" name="unit_price" v-model.number="formInvoice.unit_price" placeholder="unit_price"
                     :class="{'is-invalid': formErrors['products.' + productIndex + '.unit_price']}">
            </div>

            <div class="col-2">
               <!-- <input type="number" min="1" class="form-control form-control-sm" name="quantity[]" v-model="formInvoice.quantity" placeholder="Quantity"> -->
               <input type="number" min="1" class="form-control form-control-sm" name="quantity" v-model.number="formInvoice.quantity" placeholder="Quantity"
                      :class="{'is-invalid': formErrors['products.' + productIndex + '.quantity']}">
            </div>

            <div class="col-2">
               <p>$ {{ formInvoice.quantity * formInvoice.unit_price | currency }}</p>
            </div>

            <div class="col-1">
               <button type="button" class="btn btn-danger btn-sm" @click="onDelete"> X </button>
            </div>

         </div>

   </div>

</template>

<script>
export default {
   props: ['formInvoice', 'formErrors', 'productIndex'],
   data() {
      return {
         // products: [],
         // selected: ''
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
//   , created() {
//       axios.get('/products').then( response => {
//          this.products = response.data;
//          // console.log(response.data)
//       }).catch( error =>
//          console.log(error)
//       ).then(function () {
//          // always executed
//       });
//    }
}
</script>
