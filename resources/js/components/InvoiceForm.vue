<template>
  <div class="card">

      <div class="card-header">
         <h5>Create an Invoice</h5>
      </div>

      <div class="card-body">

         <form>

            <invoice-header :formInvoice="form" :errorsInvoice="errors"></invoice-header>

            <hr />

            <h5>Select products to include in detail list</h5>
            <invoice-search-product :selectedProducts="form.products"></invoice-search-product>

            <hr />

            <!-- Invoice Detail (Product Lines) -->
            <div class="row pl-3">
               <h5>List of choosen products</h5>
            </div>
            <table class="table table-condensed">
               <thead>
                  <tr>
                     <th> Product Name </th>
                     <th> Unit Price $ </th>
                     <th> Quantity </th>
                     <th> SubTotal $ </th>
                     <th> Action </th>
                  </tr>
               </thead>
               <tbody>
                  <invoice-product v-for="(product, index) in form.products" :key="index" :formInvoice="product"
                              :formErrors="errors"
                              :productIndex="index"
                              @delete="deleteProduct(index)">
                  </invoice-product>
               </tbody>
            </table>

            <div class="row">
               <div class="col-6 pt-2">
                  <h5 class="float-right"><strong> Total: $ {{ total.toFixed(2) }} </strong></h5>
               </div>
            </div>

            <button type="button" class="btn btn-primary btn-sm float-right"
                    @click="addInvoice"
                    :disabled="form.products.length <= 0"> Create Invoice </button>

         </form>

      </div>

   </div>

</template>

<script>
import InvoiceProduct from './InvoiceProduct.vue';
import InvoiceSearchProduct from './InvoiceSearchProduct.vue';
export default {
  components: { InvoiceProduct, InvoiceSearchProduct },
   data() {
      return {
         form: {
            number: '',
            date: '',
            payment_method: 'cash',
            client_id: '',
            products: [
               // { product_id: 1, unit_price: 100, quantity: 5 },
               // { product_id: '2', price: 200, quantity: 4 },
               // { product_id: '3', price: 300, quantity: 3 },
               // { product_id: '4', price: 400, quantity: 2 },
               // { product_id: '5', price: 500, quantity: 1 },
            ]
         },
         errors: {}
      }
   },
   methods: {
      addInvoice() {
         this.errors = {}; // clear previous errors.
         axios.post('/invoices', this.form)
              .then( function(response) {
                  console.log(response.data)
                  if (response.data.created == true) { // success
                     window.location.href = "/invoices"
                  }
               })
              .catch( error => {
                  // console.log(error.response.data.errors)
                  this.errors = error.response.data.errors;
               });
      },
      deleteProduct(index) {
         // if (this.form.products.length > 1) { // always leave 1 invoiceProductLine.
            this.form.products.splice(index, 1);
         // }
      }
   },
   computed: {
      total() {
         return this.form.products.reduce((acc, item) => acc + item.unit_price * item.quantity, 0);
      }
   }
}
</script>
