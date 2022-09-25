@include('layouts._lista_posts_template', [
    'title' => $escritor->nome_completo,
    'css' => 'perfil-escritor.css',
    'icon' => 'user_icon_fill.svg',
    'sidebar_type' => 'escritor'
])