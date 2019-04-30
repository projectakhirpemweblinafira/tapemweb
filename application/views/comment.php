<div class="card my-4">
  <h5 class="card-header">Leave a Comment:</h5>

  <div class="card-body">
    <?php foreach ($posts as $post) : ?>
      <form action="<?= base_url('comment/addcomment/' . $post->id_post); ?>" method="post">
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo $post->id_post; ?>" />
          <textarea class="form-control" rows="3" name="komentar"></textarea>
        </div>
        <?php if (!$this->session->userdata('username')) { ?>
          <input type="submit" value="Submit" formaction="<?= base_url('auth'); ?>" />
        <?php
      } else { ?>
          <input type="submit" value="Submit" formaction="<?= base_url('comment/addcomment/' . $post->id_post); ?>" />
        <?php } ?>
      </form>
    <?php endforeach; ?>
  </div>
</div>
<hr>
<h5><strong>Komentar</strong></h5>
<hr>
<table>
  <tr>
    <td>
      <?php foreach ($comments as $comment) : ?>
        <b><?= $comment->username_komen; ?></b>
        <p><?= $comment->waktu_komentar; ?><br></p>
        <p><?= $comment->komentar; ?></p>
        <hr>
      <?php endforeach; ?>
    </td>
  </tr>
</table>
</div>
</div>
</div>
</body>

</html>