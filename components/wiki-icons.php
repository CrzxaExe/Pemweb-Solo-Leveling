<?php function wiki_icon($name){
    $icons=[
        'trash'=>'<svg viewBox="0 0 24 24"><path d="M9 3h6l1 2h4v2H4V5h4l1-2Zm-2 6h10l-.7 11H7.7L7 9Zm3 2v7h2v-7h-2Zm4 0v7h2v-7h-2Z"/></svg>',
        'edit'=>'<svg viewBox="0 0 24 24"><path d="m4 16.8 11.5-11.5 3.2 3.2L7.2 20H4v-3.2ZM17 3.8l1.2-1.2a1.5 1.5 0 0 1 2.1 0l1.1 1.1a1.5 1.5 0 0 1 0 2.1L20.2 7 17 3.8Z"/></svg>',
        'plus'=>'<svg viewBox="0 0 24 24"><path d="M11 4h2v7h7v2h-7v7h-2v-7H4v-2h7V4Z"/></svg>',
        'ability'=>'<svg viewBox="0 0 24 24"><path d="M14.8 3.2 21 1l-2.2 6.2-9.9 9.9-4-4 9.9-9.9ZM3.6 14.4l6 6-2.1 2.1-2.2-2.2-2 2L1.7 20.7l2-2-2.2-2.2 2.1-2.1Z"/></svg>'
    ]; echo $icons[$name]??'';
} ?>
