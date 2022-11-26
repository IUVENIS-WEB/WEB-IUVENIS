<?php
namespace App\Contracts;
interface IPostRepository{
    function getPosts($tagIdArray = [], $take = 10);
    function getMostViewedEscritor($take = 10);
    function getLastSavedPosts($userId, $take = 10);
    function groupedPostsByTag($tipo = null, $take = 10);
    function getComentarioPostbyIdPai($id);
    function getColecoesByUser($id);
    function getPostByIdColecoes($id);
    function postRecomendado();
    function getPostsUser($id, $tipo = null );
    function getPostsByColecao($id);
    function mostRecentEvent();
    function postViewCount($id);
    function getPostsByEscritor($id);
    function getPostsByTag($tagId);
    function postsDenunciados();
    function postsWithTags();
    function logado($user, $senha);
}