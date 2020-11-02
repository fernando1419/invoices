<template>
   <div>

      <div class="row bg-light mb-2">
         <div class="col-5"> Product Name </div>
         <div class="col-2"> Unit Price $ </div>
         <div class="col-2"> Quantity </div>
         <div class="col-2"> Sub Total $ </div>
      </div>

      <invoice-product
         v-for="(product, index) in products"
         :key="product.id"
         :invoiceItem="product"
         @delete="deleteProduct(index)">
      </invoice-product>

      <div class="row">
         <div class="col-6">
            <add-invoice-product @addInvoiceItem="addProduct"></add-invoice-product>
         </div>
         <div class="col-6 pt-2">
            <h5 class="float-right"><strong> Total: $ {{ total }} </strong></h5>
         </div>
      </div>

   </div>
</template>

<script>
   export default {
      data () {
         return {
            products: [
               { name: 'Product1', price: 100, quantity: 5 },
               // { name: 'Product2', price: 200, quantity: 4 },
               // { name: 'Product3', price: 300, quantity: 3 },
               // { name: 'Product4', price: 400, quantity: 2 },
               // { name: 'Product5', price: 500, quantity: 1 },
            ]
         }
      },
      mounted() {
         // axios.get('/products')
         //       .then( response => {
         //          this.products = response.data;
         //          // console.log(response.data)
         //       })
         //       .catch( error => console.log(error) )
      },
      methods: {
         deleteProduct(index) {
            if (this.products.length > 1) { // always leave 1 invoiceProductLine.
               this.products.splice(index, 1);
            }
         },
         addProduct() {
            this.products.push(
               { name: '', price: 0, quantity: 1 },
            );
         }
      },
      computed: {
         total() {
            return this.products.reduce((acc, item) => acc + item.price * item.quantity, 0);
         }
      }
   }
</script>
