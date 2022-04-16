<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                    <h3 class="text-success">Comments</h3>
                    <hr/>
                    <ul class="comments">
                        <template v-for="comment in comments">
                            <comment
                                @open-reply-modal="openReplyModal"
                                :children="comment.children"
                                :comment="comment.comment"
                                :created_at="comment.created_at"
                                :parent_id="comment.parent_id"
                                :user_name="comment.user_name"
                                :layer="comment.layer"
                                :id="comment.id"
                            ></comment>
                        </template>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="blog-comment">
                    <ul class="comments">
                        <li class="clearfix">
                            <div class="posting-comments">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" v-model="user_name" class="form-control"
                                           placeholder="Name Surname">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Comment</label>
                                    <textarea v-model="commentVal" class="form-control" cols="30" rows="5"
                                              placeholder="Your Comment..."></textarea>
                                </div>
                                <button @click="saveParentComment" class="btn btn-success text-end">Save</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <template>
            <div>
                <b-modal v-model="modalShow" title="Reply Comment" @ok="saveChildComment">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" v-model="reply_user_name" class="form-control"
                               placeholder="Name Surname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea v-model="replyCommentVal" class="form-control" cols="30" rows="5"
                                  placeholder="Your Comment..."></textarea>
                    </div>
                </b-modal>
            </div>
        </template>

    </div>
</template>

<script>
import Comment from "./Comment";
import axios from "axios";

export default {
    components: {
        Comment
    },
    data() {
        return {
            commentVal: "",
            user_name: "",
            reply_user_name: "",
            replyCommentVal: "",
            replyParentId: 0,
            replyLayer: 0,
            modalShow: false
        }
    },
    props: ["comments"],
    methods: {
        async saveParentComment() {
            const reqData = {
                parent_id: null,
                layer: 0,
                user_name: this.user_name,
                comment: this.commentVal
            }
            await axios.post("api/comment", reqData).then(response => {
                console.log(response)

                this.commentVal = ""
                this.user_name = ""
            })
            this.$emit("fetch-again");
        },
        openReplyModal(e) {
            this.replyParentId = e.parent_id
            this.replyLayer = e.layer
            this.modalShow = true
        },
        async saveChildComment() {
            const reqData = {
                parent_id: this.replyParentId,
                layer: Number(this.replyLayer) + 1,
                user_name: this.reply_user_name,
                comment: this.replyCommentVal
            }
            await axios.post("api/comment", reqData).then(response => {
                console.log(response)

                this.reply_user_name = ""
                this.replyCommentVal = ""
                this.replyParentId = 0
                this.replyLayer = 0
                this.modalShow = false
            })
            this.$emit("fetch-again");
        }
    },
}
</script>
