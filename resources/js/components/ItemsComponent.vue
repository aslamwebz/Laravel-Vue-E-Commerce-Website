<template>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <span v-for="item in items" v-bind:key="item.i">
                    <span v-html="item" v-on:del="del"></span>   
               </span>
            </div>
        </div>
      <div class="row">
        <div class="col-md-12">
            <button v-on:click.prevent="add" class="btn btn-primary">Add</button>
            <!-- <button class="btn btn-submit" name="submit">Submit</button> -->
        </div>
    </div>
    </div>
</template>

<script>



export default {
        data(){
            return{
             
            }
        },

        created(){
        },
  
}
</script>
