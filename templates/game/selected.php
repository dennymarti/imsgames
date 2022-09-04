<div class="game-container" id="game-container">
    <a class="nav-authentication game-button" href="#game-container">
        <button id="prevent">Fokusieren</button>
    </a>
    <object class="game" data="/games/<?= $game->dir; ?>/index.html"></object>
    <a class="nav-authentication game-button" href="#comments">
        <button id="allow">Verlassen</button>
    </a>
</div>

<div class="comment-wrapper">
    <form action="/comment/create?id=<?= $game->id; ?>" class="comment-form" method="post">
        <textarea class="comment-textarea" id="comment-textarea" name="comment" placeholder="Kommentar hinzufügen" onkeyup="enableCommentButton(event)"></textarea>
        <script>
            const textarea = document.getElementById('comment-textarea');
            textarea.style.cssText = `height: ${textarea.scrollHeight}px; overflow-y: hidden`;

            textarea.addEventListener('input', function() {
                this.style.height = "28px";
                this.style.height = `${this.scrollHeight}px`;
            })
        </script>

        <div class="comment-buttons">
            <button class="comment-button" type="button" onclick="cancelComment(event)" disabled>Abbrechen</button>
            <button class="comment-button" type="submit" disabled>Kommentieren</button>
        </div>
    </form>
    <div class="comments" id="comments">
        <?php if (empty($comments)): ?>
            <div class="comment-card">
                <h2 class="item title">Kein Kommentar gefunden.</h2>
            </div>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment-card">
                    <div class="comment-user">
                        <i class="bx bxs-user-circle bx-cu"></i>
                    </div>
                    <div class="comment-content">
                        <?php foreach($users as $user):?>
                            <?php if ($user->id == $comment->user_id) : ?>
                                <h4  class="comment-username"> <?= $user->username; ?></h4>                          
                            <?php endif; ?> 
                        <?php endforeach; ?>                        
                        <p class="comment-text"><?= $comment->comment; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<script src="/js/scrolldisable.js"></script>
