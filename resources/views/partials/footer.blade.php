<footer class="content-info">
  <div class="container mx-auto">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>

  <div class="container mx-auto">
    <div class="copy footer">
      <p>&copy; Filip Păcurar {{ date('Y') }} | Made with love and <a href="https://tailwindcss.com/" target='_blank'>Tailwind CSS</a>.</p>
    </div>
  </div>
</footer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53615822-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-53615822-4');
</script>
