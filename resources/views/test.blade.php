@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add User')])   


<div class="" id="test">
    <div class="container-fluid mt-7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow p-3">
                    <form action="{{route('sales.test')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <span v-for="item in items" :key="item.i">
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="dataArray[]" class="form-control" aria-describedby="button-del">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-danger" type="button" v-on:click.prevent="rem(item)" id="button-del">X</button>
                                                </div>
                                            </div>
                                            <br>
                                        </td>
                                    </tr>   
                                </span>
                            </div>
                        </div> 
                        <br> 
                        <div class="row">
                            <div class="col-md-12">
                                <button v-on:click.prevent="add" class="btn btn-primary">Add</button>
                                <button class="btn btn-submit" type="submit" name="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                    <div class="container">
                    </Multiselect>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>


<script>

    //     $(document).click('#rm', function(e){
    //         e.preventDefault();
    //     $(this).closest('tr').remove();
    // });

   
    const app = new Vue({
        el:'#test',
        data:{
            items:[],
            item:'',
            i:1,
        },
        created(){
            // this.items.push(this.item);
        },
        methods:{
            add(){
                // this.item = '<input name="dataArray['
                // // this.item += this.i;
                // this.item += ']" id="" class="form-control">';
                this.item = this.i;
                this.items.push(this.item);
                this.i++;
            },
            rem(item){
                const todoIndex = this.items.indexOf(item);
                this.items.splice(todoIndex, 1);
            }
        }

    });
</script>

@endsection

