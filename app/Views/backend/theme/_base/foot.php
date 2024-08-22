        <?php
        foreach ($scripts['foot'] as $file)
        {
            $url = starts_with($file, 'http') ? $file : base_url($file);
            echo "<script src='$url'></script>".PHP_EOL;
        }
        ?>
        <script>
        $(document).ready(function() {
            $(".select2_multiple").select2({
                allowClear: true
            });
        });
        </script>
    </body>
</html>