<template>
    <div>
        <div v-for="(reply, index) in items" :key="reply.id">
            <reply :data="reply" @deleted="remove(index)"></reply>
        </div>
            <paginator></paginator>
        <new-reply :endpoint="endpoint" @created="add"></new-reply>
    </div>
</template>

<script>
    import  Reply from './Reply.vue';
    import NewReply from './NewReply.vue';
    import collection from '../mixins/collection.js';
    export default {
        components: {Reply, NewReply},
        mixins:[collection],
        data() {
            return {
                dataSet: false,
                endpoint: location.pathname + '/replies'
            }
        },
        created(){
            this.fetch();
        },
        methods: {
            fetch(){
                axios.get(this.url())
                    .then(this.refresh);
            },
            url(){
                return location.pathname + '/replies';
            },
            refresh({data}){
                this.dataSet = data;
                this.items = data.data;
            }
        }
    }
</script>