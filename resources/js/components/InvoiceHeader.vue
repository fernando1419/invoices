<template>
      <!-- Invoice Header -->
   <div class="row">

      <!-- Invoice Data -->
      <div class="col-6">

         <!-- <div v-if="validationErrors">
            <ul class="alert alert-danger">
               <li v-for="(value, key) in validationErrors" :key="key">{{ value }} {{key}}</li>
            </ul>
         </div> -->

         <div class="form-group">
            <label for="number">Invoice Number</label>
            <input type="text" name="number" class="form-control form-control-sm" placeholder="Invoice Number" v-model.number="formInvoice.number">
            <p v-if="errorsInvoice && errorsInvoice.number" class="text-danger"> {{ errorsInvoice.number[0] }}</p>
         </div>

         <div class="row">
            <div class="col-6">
               <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" id="date" name="date" class="form-control form-control-sm" v-model="formInvoice.date">
                  <p v-if="errorsInvoice && errorsInvoice.date" class="text-danger"> {{ errorsInvoice.date[0] }}</p>
               </div>
            </div>

            <div class="col-6">
               <div class="form-group">
                  <label for="payment_method">Payment</label>
                  <select name="payment_method" class="form-control form-control-sm" v-model="formInvoice.payment_method">
                     <option value="cash">  cash </option>
                     <option value="debit-card"> debit-card </option>
                     <option value="credit-card"> credit-card </option>
                     <option value="wire-transfer"> wire-transfer </option>
                     <option value="bank-check"> bank-check </option>
                  </select>
                  <p v-if="errorsInvoice && errorsInvoice.payment_method" class="text-danger"> {{ errorsInvoice.payment_method[0] }} </p>
               </div>
            </div>

         </div>

      </div>

      <!-- Customer Data -->
      <div class="col-6">
         <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control form-control-sm" v-model.number="formInvoice.client_id">
               <option value=""> Select a Client... </option>
               <option value="1"> Client 1 </option>
               <option value="2"> Client 2 </option>
            </select>
            <p v-if="errorsInvoice && errorsInvoice.client_id" class="text-danger"> {{errorsInvoice.client_id[0] }} </p>
         </div>
      </div>

   </div>

</template>

<script>
export default {
   props: ['formInvoice', 'errorsInvoice'],
   // data() {
   //    return {
   //       cash: 'cash' // fixed the selected in option not working with v-model.
   //    }
   // }
}
</script>
