<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fila de Atendimento - Literatus + Saúde</title>
  <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #fff; /* Cor de fundo do corpo do site (branco) */
  }
  
  .wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  header {
    background-color: #fff; /* Cor de fundo do cabeçalho (branco) */
    text-align: center;
    padding: 20px 0;
  }
  
  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .logo img {
    width: 50px; /* Ajuste o tamanho do logo conforme necessário */
    height: 50px;
    margin-right: 10px;
  }
  
  .logo h1 {
    font-size: 24px;
    color: #006400; /* Cor do título do site (verde escuro) */
    margin: 0;
  }
  
  main {
    padding: 20px;
  }
  
  h1 {
    font-size: 32px;
    color: #006400; /* Cor do título da página (verde escuro) */
    text-align: center;
    margin-bottom: 20px;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #ccc; /* Borda da tabela (cinza claro) */
  }
  
  th, td {
    border: 1px solid #ccc; /* Borda das células da tabela (cinza claro) */
    padding: 10px;
  }
  
  th {
    background-color: #f0f0f0; /* Cor de fundo dos cabeçalhos (cinza claro) */
  }
  
  tr:hover {
    background-color: #f5f5f5; /* Cor de fundo ao passar o mouse sobre as linhas da tabela (cinza mais claro) */
  }
  
  footer {
    background-color: #fff; /* Cor de fundo do rodapé (branco) */
    text-align: center;
    padding: 20px 0;
  }
  
  .social-icons {
    margin-bottom: 10px;
  }
  
  .social-icons a {
    display: inline-block;
    margin: 0 10px;
    color: #333; /* Cor dos ícones (preto) */
    font-size: 24px;
  }
  
  .rights-reserved {
    font-size: 14px;
    color: #555; /* Cor do texto do rodapé (cinza) */
  }
  

  </style>
</head>

<body>
  <div class="wrapper">
    <header>
      <div class="logo">
        <a href="index.php"><img src="img/Solzinho.png" alt="Logo Literatus + Saúde"></a>
        <h1>Literatus + Saúde</h1>
      </div>
    </header>

    <main>
      <h1>Fila de Atendimento</h1>

      <!-- PHP para exibir a fila de atendimento -->
      <?php
      // Dados do banco de dados
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "literatus_saude";
  
      // Criar a conexão
      $conn = new mysqli($servername, $username, $password, $dbname);
  
      // Verificar a conexão
      if ($conn->connect_error) {
          die("Conexão falhou: " . $conn->connect_error);
      }
  
      // Consulta para obter a fila de atendimento somente para massoterapia
      $sql = "SELECT nomeCompleto, codigo_atendimento, atendimento_concluido FROM usuarios WHERE servicos LIKE '%Massoterapia%' AND atendimento_concluido = 0";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
        // Exibir a tabela de atendimento
        echo '<table>';
        echo '<tr><th>Nome</th><th>Código de Atendimento</th><th>Status de Atendimento</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
          $nomeCompleto = $row["nomeCompleto"];
          $codigoAtendimento = $row["codigo_atendimento"];
  
          echo '<tr>';
          echo '<td>' . $nomeCompleto . '</td>';
          echo '<td>' . $codigoAtendimento . '</td>';
          echo '<td>Pendente</td>';
          echo '</tr>';
        }
  
        echo '</table>';
      } else {
        echo "Nenhum usuário cadastrado para os serviços de massoterapia ou todos os atendimentos foram concluídos.";
      }
  
      // Fecha a conexão com o banco de dados
      $conn->close();
    ?>

    </main>

    <footer>
      <div class="social-icons">
        <!-- Coloque os ícones de redes sociais aqui -->
      </div>
      <p class="rights-reserved">© Centro de Ensino Literatus - Todos os direitos reservados</p>
    </footer>
  </div>
</body>

</html>
