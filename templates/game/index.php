<div class="games-wrapper">
    <div class="games-flexbox">
        <?php if (empty($games)): ?>
            <div class="box">
                <div class="box-header">
                    <h2 class="box-title"></h2>
                </div>

                <div class="box-content">
                    <div class="output-field">
                        <h4>Beschreibung</h4>
                        <p class="box-text"><?= $game->description; ?></p>
                    </div>
                </div>

                <div class="game-box-footer">
                    <a href="/game/selected?id=<?= $game->id; ?>"><button class="btn btn-primary">Ansehen</button></a>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($games as $game): ?>
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title"><?= $game->name; ?></h2>
                    </div>

                    <div class="box-content">
                        <div class="box-field">
                            <h4 class="field-title">Beschreibung</h4>
                            <textarea class="box-textarea" readonly><?= $game->description; ?></textarea>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="/game/selected?id=<?= $game->id; ?>"><button class="box-button">Ansehen</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>