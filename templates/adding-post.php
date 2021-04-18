<main class="page__main page__main--adding-post">
  <div class="page__main-section">
    <div class="container">
      <h1 class="page__title page__title--adding-post">Добавить публикацию</h1>
    </div>
    <div class="adding-post container">
      <div class="adding-post__tabs-wrapper tabs">
        <div class="adding-post__tabs filters">
          <ul class="adding-post__tabs-list filters__list tabs__list">
            <?php foreach ($types as $key => $val) : ?>
            <li class="adding-post__tabs-item filters__item">
              <a class="adding-post__tabs-link
                              filters__button
                              filters__button--<?= $val['class_name']; ?>
                              <?= $val['class_name'] === $tab_name ? 'filters__button--active tabs__item--active' : ' '; ?>
                              tabs__item
                              button" href="#">
                <svg class="filters__icon" width="<?= $val['icon_width']; ?>" height="<?= $val['icon_height']; ?>">
                  <use xlink:href="#icon-filter-<?= $val['class_name']; ?>"></use>
                </svg>
                <span><?= $val['title']; ?></span>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="adding-post__tab-content">
          <?php foreach ($types as $key => $val) : ?>
          <section
            class="adding-post__<?= $val['class_name']; ?> tabs__content <?= $val['class_name'] === $tab_name ? 'tabs__content--active' : ''; ?>">
            <h2 class="visually-hidden">Форма добавления <?= $val['title']; ?></h2>
            <form class="adding-post__form form" action="/add.php" method="POST" <?= $val['class_name'] === 'photo' ? 'enctype="multipart/form-data"' : ''; ?>>
                <input type="text" class="visually-hidden" name="current-tab" value="<?= $val['class_name']; ?>">
              <div class="form__text-inputs-wrapper">
                <div class="form__text-inputs">
                  <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="<?= $val['class_name']; ?>-heading">Заголовок
                      <span class="form__input-required">*</span></label>
                    <div class="form__input-section">
                      <input class="adding-post__input form__input" id="<?= $val['class_name']; ?>-heading" type="text"
                        name="post-heading" placeholder="Введите заголовок" required>
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <?php if($val['class_name'] === 'photo'): ?>
                  <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="photo-url">Ссылка из интернета</label>
                    <div class="form__input-section">
                      <input class="adding-post__input form__input" id="photo-url" type="text" name="photo-url"
                        placeholder="Введите ссылку">
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if($val['class_name'] === 'video'): ?>
                  <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="video-url">Ссылка youtube <span
                        class="form__input-required">*</span></label>
                    <div class="form__input-section">
                      <input class="adding-post__input form__input" id="video-url" type="text" name="video-link"
                        placeholder="Введите ссылку">
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об
                          ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if($val['class_name'] === 'text'): ?>
                  <div class="adding-post__textarea-wrapper form__textarea-wrapper">
                    <label class="adding-post__label form__label" for="post-text">Текст поста <span
                        class="form__input-required">*</span></label>
                    <div class="form__input-section">
                      <textarea class="adding-post__textarea form__textarea form__input" id="post-text" name="post-text"
                        placeholder="Введите текст публикации"></textarea>
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об
                          ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if($val['class_name'] === 'quote'): ?>
                  <div class="adding-post__input-wrapper form__textarea-wrapper">
                    <label class="adding-post__label form__label" for="quote-text">Текст цитаты <span
                        class="form__input-required">*</span></label>
                    <div class="form__input-section">
                      <textarea class="adding-post__textarea adding-post__textarea--quote form__textarea form__input"
                        id="quote-text" name="quote-text" placeholder="Текст цитаты"></textarea>
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об
                          ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <div class="adding-post__textarea-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="quote-author">Автор <span
                        class="form__input-required">*</span></label>
                    <div class="form__input-section">
                      <input class="adding-post__input form__input" id="quote-author" type="text" name="quote-author">
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об
                          ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if($val['class_name'] === 'link'): ?>
                  <div class="adding-post__textarea-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="post-link">Ссылка <span
                        class="form__input-required">*</span></label>
                    <div class="form__input-section">
                      <input class="adding-post__input form__input" id="post-link" type="text" name="post-link">
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об
                          ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="<?= $val['class_name']; ?>-tags">Теги</label>
                    <div class="form__input-section">
                      <input class="adding-post__input form__input" id="<?= $val['class_name']; ?>-tags" type="text" name="post-tags"
                        placeholder="Введите теги">
                      <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация
                          об ошибке</span></button>
                      <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form__invalid-block">
                  <b class="form__invalid-slogan">Пожалуйста, исправьте следующие ошибки:</b>
                  <ul class="form__invalid-list">
                    <li class="form__invalid-item">Заголовок. Это поле должно быть заполнено.</li>
                      <?php if($val['class_name'] === 'quote'): ?>
                        <li class="form__invalid-item">Цитата. Она не должна превышать 70 знаков.</li>
                      <?php endif; ?>
                  </ul>
                </div>
              </div>
              <?php if ($val['class_name'] === 'photo'): ?>
              <div class="adding-post__input-file-container form__input-container form__input-container--file">
                <div class="adding-post__input-file-wrapper form__input-file-wrapper">
                  <div class="adding-post__file-zone adding-post__file-zone--photo form__file-zone dropzone">
                    <input class="adding-post__input-file form__input-file" id="userpic-file-photo" type="file"
                      name="userpic-file-photo">
                    <div class="form__file-zone-text">
                      <span>Перетащите фото сюда</span>
                    </div>
                  </div>
                </div>
                <div class="adding-post__file adding-post__file--photo form__file dropzone-previews">
                </div>
              </div>
              <?php endif; ?>
              <div class="adding-post__buttons">
                <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                <a class="adding-post__close" href="#">Закрыть</a>
              </div>
            </form>
          </section>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</main>
