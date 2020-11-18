<template>
<div>
   <h5>Select products to include in detail list</h5>
   <div class="row bg-light mb-2">
      <div class="col-4"> Product Name </div>
      <div class="col-2"> Unit Price $ </div>
      <div class="col-2"> Quantity </div>
      <div class="col-2"> Sub Total $ </div>
      <div class="col-2"> Action </div>
   </div>

   <div class="row">
      <div class="col-4">
         <select class="form-control form-control-sm" v-model="selectedProductId" @change="getProductData()">
            <option v-for="(product, index) in products" :key="index" :value="product.id">
               {{ "Product: " + product.name + "  Price: $ " + product.unit_price + " Index: " + index }}
            </option>
         </select>
      </div>

      <div class="col-2">
         <input type="number" class="form-control form-control-sm" name="unit_price" v-model.number="unit_price" placeholder="unit_price">
      </div>

      <div class="col-1">
         <input type="number" min="1" class="form-control form-control-sm" name="quantity" v-model.number="quantity" placeholder="Quantity">
      </div>

      <div class="col-2">
         <p>$ {{ quantity * unit_price | currency }}</p>
      </div>

      <div class="col-2">
         <button type="button" class="btn btn-success btn-sm" @click="addLine"> Add to list </button>
      </div>

   </div>

</div>
</template>

<script>
export default {
   props: ['formErrors', 'selectedProducts'],
   data() {
      return {
         products: [],
         selectedProductId: '',
         name: '',
         unit_price: 0,
         quantity: 1
      }
   },
   methods: {
      onDelete: function() {
         this.$emit('delete')
      },
      getProductData() {
         // console.log(this.selectedProductId)
         return this.products.filter(product => {
            if (this.selectedProductId == product.id) {
               this.unit_price = product.unit_price
               this.name = product.name
            }
         });
      },
      addLine() {
         let productIndex = this.selectedProducts.findIndex((obj => obj.product_id == this.selectedProductId));
         // console.log(productIndex)
         if (productIndex === -1) { // not found.
            this.selectedProducts.push( {product_id: this.selectedProductId, name: this.name, unit_price: this.unit_price, quantity: this.quantity})
         } else {
            this.selectedProducts[productIndex].quantity += this.quantity
            this.selectedProducts[productIndex].unit_price = this.unit_price
         }
      }
   },
  filters: {
     currency(value) {
        return value.toFixed(2);
     }
  },
  created() {
      axios.get('/products').then( response => {
         // console.log(response.data)
         this.products = response.data;
         this.selectedProductId = this.products[0].id // select first item.
         this.getProductData()
      }).catch( error =>
         console.log(error)
      ).then(function () {
         // always executed
      });
   }
}
</script>
