<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Endereco;
use App\Entity\ContratoLocacao;
use App\Entity\ContratoAdm;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", name="cpf_cnpj", length=15, nullable=false)
     */
    private $cpfCnpj;

    /**
     * @ORM\Column(type="date", name="dt_nascimento", nullable=false)
     */
    private $dtNascimento;

    /**
     * @ORM\Column(type="date", name="dt_cadastro", nullable=true)
     */
    private $dtCadastro;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $sexo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Endereco", inversedBy="cliente", cascade={"persist"})
     * @ORM\JoinColumn(name="id_endereco", referencedColumnName="id", unique=true, nullable=true)
     */
    private $endereco;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContratoAdm", mappedBy="usuario")
     */
    private $contratoAdm;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContratoLocacao", mappedBy="usuario")
     */
    private $contratoLocacao;

    /**
     * @var string
     * @ORM\Column(type="string", name="tipo_usuario", nullable=true)
     */
    private $tipoUsuario;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, name="login", nullable=true)
     */
    private $login;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, name="senha", nullable=true)
     */
    private $senha;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param mixed $cpfCnpj
     */
    public function setCpfCnpj($cpfCnpj): void
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    /**
     * @return mixed
     */
    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    /**
     * @param mixed $dtNascimento
     */
    public function setDtNascimento($dtNascimento): void
    {
        $this->dtNascimento = $dtNascimento;
    }

    /**
     * @return mixed
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * @param mixed $dtCadastro
     */
    public function setDtCadastro($dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getContratoLocacao()
    {
        return $this->contratoLocacao;
    }

    /**
     * @param mixed $contratoLocacao
     */
    public function setContratoLocacao($contratoLocacao): void
    {
        $this->contratoLocacao = $contratoLocacao;
    }

    /**
     * @return mixed
     */
    public function getContratoAdm()
    {
        return $this->contratoAdm;
    }

    /**
     * @param mixed $contratoAdm
     */
    public function setContratoAdm($contratoAdm): void
    {
        $this->contratoAdm = $contratoAdm;
    }

    /**
     * @return string
     */
    public function getTipoUsuario(): ?string
    {
        return $this->tipoUsuario;
    }

    /**
     * @param string $tipoUsuario
     */
    public function setTipoUsuario(string $tipoUsuario): void
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

}
