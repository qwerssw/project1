<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>{{ __('messages.about_us') }}</h3>
            <p>{{ __('messages.about_text') }}</p>
            <div class="social-links">
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>{{ __('messages.quick_links') }}</h3>
            <ul>
                <li><a href="#">{{ __('messages.home') }}</a></li>
                <li><a href="#">{{ __('messages.all_hotels') }}</a></li>
                <li><a href="#">{{ __('messages.reviews') }}</a></li>
                <li><a href="#">{{ __('messages.faq') }}</a></li>
                <li><a href="#">{{ __('messages.contacts') }}</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>{{ __('messages.contact_info') }}</h3>
            <ul class="contact-info">
                <li> <span>{{ __('messages.address') }}</span></li>
                <li> <span>{{ __('messages.phone') }}</span></li>
                <li><span>{{ __('messages.email') }}</span></li>
                <li><span>{{ __('messages.work_time') }}</span></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>{{ __('messages.subscribe_title') }}</h3>
            <p>{{ __('messages.subscribe_text') }}</p>
            <form class="newsletter-form" action="#" method="POST">
                @csrf
                <input type="email" class="newsletter-input" placeholder="Ваш email" required>
                <button type="submit" class="newsletter-btn">{{ __('messages.subscribe') }}</button>
            </form>
        </div>
    </div>
</footer>