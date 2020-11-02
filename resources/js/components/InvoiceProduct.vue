<template>
   <div class="row">
      <div class="col-12">
         <div class="form-row">

            <input type="hidden" name="return[]">

            <div class="col-5">
               <select name="product_array[]" class="form-control form-control-sm" v-model="selected">
                  <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name + " " + product.unit_price }}</option>
               </select>
               <!-- <input type="text" class="form-control form-control-sm" name="product[]" v-model="invoiceItem.name" placeholder="product"> -->
            </div>

            <div class="col-2">
               <input type="number" class="form-control form-control-sm" name="price[]" v-model="invoiceItem.price" placeholder="Price">
            </div>

            <div class="col-2">
               <input type="number" min="1" class="form-control form-control-sm" name="quantity[]" v-model="invoiceItem.quantity" placeholder="Quantity">
            </div>

            <div class="col-2">
               <p>$ {{ invoiceItem.quantity * invoiceItem.price | currency }}</p>
            </div>

            <div class="col-1">
               <button type="button" class="btn btn-danger btn-sm" @click="onDelete"> X </button>
            </div>

         </div>
      </div>
   </div>

</template>

<script>
export default {
   props: ['invoiceItem'],
   data() {
      return {
         products: [],
         selected: ''
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
  , created() {
      axios.get('/products').then( response => {
         this.products = response.data;
         // console.log(response.data)
      }).catch( error =>
         console.log(error)
      ).then(function () {
         // always executed
      });
   }
}
</script>
