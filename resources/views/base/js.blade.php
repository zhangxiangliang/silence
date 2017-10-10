{{-- 引用 jQuery --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

{{-- 引用 Semantic-UI --}}
<script src="{{ asset('assets/js/semantic.js') }}"></script>

<script type="text/javascript">
    $('.ui.dropdown').dropdown({
        on: 'hover'
    });
    {{--  semantic-ui 侧边栏菜单调用 --}}
    $('.sidebar.menu').first().sidebar('attach events', '.toc.item');
</script>