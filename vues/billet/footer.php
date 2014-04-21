          </div>
          
          <nav class="span4">

            <h2><?php echo (isset($billet_a_modifier) ? 'Modifier' : 'Ajouter'); ?> un billet</h2>
            <form method="post">
                <!-- Ajout billet --> 
                <input type="hidden" name="action" value="<?php echo (isset($billet_a_modifier) ? 'edit' : 'add'); ?>" />
                <label for="billet">Titre : </label><input type="billet" name="billet" id="billet" placeholder="titre de votre billet !" required="" <?php if (isset($billet_a_modifier)) echo 'value="' . $billet_a_modifier['originale']. '" disabled="disabled"';?> />
                <label for="contenu">Contenu du billet : </label><textarea id="contenu" name="contenu">
				<?php if (isset($billet_a_modifier)) echo $billet_a_modifier['contenu'] ?></textarea>
                <!-- Modifier le billet -->
				<?php if (isset($billet_a_modifier)) : ?>
                  <input type="hidden" name="id" value="<?php echo $billet_a_modifier['id'] ?>" />
                <?php endif; ?>
				<!-- Afficher le billet -->
                <input type="submit" value="<?php echo (isset($billet_a_modifier) ? 'Modifier' : 'Ajouter'); ?>" />
            </form>
            
          </nav>
        </div>
        
      </div>

      <footer>
        
      </footer>

    </div>

  </body>
</html>

