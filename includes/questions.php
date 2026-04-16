<section class="questions-block element__animation">
        <div class="container">
            <h2 class="questions-block__title">Ответы на частые вопросы</h2>
            <div class="questions-block__wrapper">
                <?php
                    $questions = get_questions();

                    foreach($questions as $row){
                ?>
                    <div class="question">
                        <div class="question__header">
                            <h3 class="question__title"><?=$row['question']?></h3>
                            <svg class="question__plus" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 20 20" fill="none">
                                <rect x="9" width="2" height="20" rx="1" fill="#BE19C7" />
                                <rect x="20" y="9" width="2" height="20" rx="1" transform="rotate(90 20 9)"
                                fill="#BE19C7"/>
                            </svg>
                        </div>
                        <div class="question__answer">
                            <p class="question__answer-text">
                                <?=$row['answer']?>
                            </p>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
</section>