<template>
    <li class="clearfix">
        <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
        <div class="post-comments">
            <p class="meta">{{ created_at }} <a href="#">{{ user_name }}</a> says
                <i v-if="layer < 2" class="pull-right">
                    <button class="btn btn-success" @click="replyModal">
                        <small>Reply</small>
                    </button>
                </i>
            </p>
            <p>
                {{ comment }}
            </p>
        </div>
        <ul class="comments">
            <template v-for="arrItem in children">
                <comment
                    @open-reply-modal="selfReply"
                    :children="arrItem.children"
                    :comment="arrItem.comment"
                    :created_at="arrItem.created_at"
                    :parent_id="arrItem.parent_id"
                    :user_name="arrItem.user_name"
                    :layer="arrItem.layer"
                    :id="arrItem.id"
                ></comment>
            </template>
        </ul>
    </li>
</template>

<script>
export default {
    name: "Comment",
    props: {
        children: {
            type: Array,
            required: false,
            default: () => {
                return []
            }
        },
        comment: String,
        user_name: String,
        parent_id: Number,
        layer: String,
        created_at: String,
        id: Number
    },
    methods: {
        replyModal() {
            const emitData = {
                parent_id : this.id,
                layer: this.layer,
            }

            this.$emit('open-reply-modal', emitData)
        },
        selfReply(e) {
            const emitData = {
                parent_id : e.parent_id,
                layer: e.layer,
            }

            this.$emit('open-reply-modal', emitData)
        }
    },
    computed:{
    }
}
</script>

<style>

</style>
