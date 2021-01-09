<template>
    <table class="table table-hover table-striped table-responsive">
        <thead>
        <tr>
            <th>Id</th>
            <th>Posts</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Update&nbsp;</th>
            <th>Delete&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts">
            <td v-text="post.id"></td>
            <td v-text="post.title"></td>
            <td v-text="post.created_at"></td>
            <td v-text="post.updated_at"></td>
            <td><a class="btn btn-warning btn-block" href="#">Update</a></td>
            <td><a href="#" class="btn btn-danger btn-block" type="submit" v-on:click.prevent="deletePost(post)">Delete</a></td>
        </tr>
        </tbody>

        <tfoot>
            <paginate-component :meta="meta" v-on:pagination="getPosts"></paginate-component>
        </tfoot>
    </table>
</template>
<script>
import axios from 'axios'

    export default {
            data()
            {
                return{
                    posts:[],
                    meta:{}
                }
            },
            mounted()
            {
                this.getPosts();
            },
        methods:
            {
                getPosts: function(page)
                {
                    axios.get('api/posts',{
                        params:{
                            page
                        }
                        }


                    ).then(response =>{
                        this.posts = response.data.data;
                        this.meta= response.data.meta;
                    });
                },
                deletePost: function(post)
                {
                    if(confirm("Want to delete?"))
                    {
                        axios.delete('api/posts/' + post.id).then(response =>{
                            this.getPosts();
                            alert('deleted success');
                        });
                    }
                }
            }
    }
</script>
