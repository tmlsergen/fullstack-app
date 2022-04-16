<template>
    <div>
        <HeaderComponent></HeaderComponent>
        <article class="container mt-4 blog-post">
            <h2 class="blog-post-title">Sample blog post</h2>
            <p class="blog-post-meta">April 16, 2022 by <a href="#">Sergen</a></p>
            <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                typography, lists, tables, images, code, and more are all supported as expected.</p>
            <hr>
            <p>This is some additional paragraph placeholder content. It has been written to fill the available space
                and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
                demonstration flowing, so be on the lookout for this exact same string of text.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa delectus nostrum officia provident
                voluptas? Commodi debitis delectus distinctio fuga fugit veritatis. Blanditiis fuga hic nulla
                voluptatibus. Beatae culpa modi quibusdam.</p>
        </article>
        <Comment v-on:fetch-again="fetchComments" :comments="comments"></Comment>
    </div>
</template>
<script>
import HeaderComponent from "./HeaderComponent";
import Comment from "./CommentComponent";
import axios from 'axios';

export default {
    components: {
        HeaderComponent,
        Comment
    },
    data() {
      return {
          comments: []
      }
    },
    async created() {
        await this.fetchComments()
    },
    methods: {
        async fetchComments(){
            await axios.get('api/comment').then(response => {
                this.comments = response.data.data;
            });
        }
    }
}
</script>

<style>
/*
 * Blog posts
 */
.blog-post {
    margin-bottom: 4rem;
}

.blog-post-title {
    margin-bottom: .25rem;
    font-size: 2.5rem;
}

.blog-post-meta {
    margin-bottom: 1.25rem;
    color: #727272;
}

body {
    background: #eee;
}

hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #FFFFFF;
}

a {
    color: #82b440;
    text-decoration: none;
}

.blog-comment::before,
.blog-comment::after,
.blog-comment-form::before,
.blog-comment-form::after {
    content: "";
    display: table;
    clear: both;
}

.blog-comment {
    padding-left: 15%;
    padding-right: 15%;
}

.blog-comment ul {
    list-style-type: none;
    padding: 0;
}

.blog-comment img {
    opacity: 1;
    filter: Alpha(opacity=100);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
}

.blog-comment img.avatar {
    position: relative;
    float: left;
    margin-left: 0;
    margin-top: 0;
    width: 65px;
    height: 65px;
}

.blog-comment .post-comments {
    border: 1px solid #eee;
    margin-bottom: 20px;
    margin-left: 85px;
    margin-right: 0px;
    padding: 10px 20px;
    position: relative;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    background: #fff;
    color: #6b6e80;
    position: relative;
}

.blog-comment .posting-comments {
    border: 1px solid #eee;
    margin-bottom: 20px;
    margin-right: 0px;
    padding: 10px 20px;
    position: relative;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    background: #fff;
    color: #6b6e80;
    position: relative;
}

.blog-comment .meta {
    font-size: 13px;
    color: #aaaaaa;
    padding-bottom: 8px;
    margin-bottom: 10px !important;
    border-bottom: 1px solid #eee;
}

.blog-comment ul.comments ul {
    list-style-type: none;
    padding: 0;
    margin-left: 85px;
}

.blog-comment-form {
    padding-left: 15%;
    padding-right: 15%;
    padding-top: 40px;
}

.blog-comment h3,
.blog-comment-form h3 {
    margin-bottom: 40px;
    font-size: 26px;
    line-height: 30px;
    font-weight: 800;
}

</style>

