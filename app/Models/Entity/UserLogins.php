<?php
namespace App\Models\Entity;

use Swoft\Db\Model;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;
use Swoft\Db\Types;

/**
 * @Entity()
 * @Table(name="user_logins")
 * @uses      UserLogins
 */
class UserLogins extends Model
{
    /**
     * @var int $id 
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var int $userId 用户id
     * @Column(name="user_id", type="integer")
     * @Required()
     */
    private $userId;

    /**
     * @var int $authServer 授权平台1微信2QQ3新浪4蜜传
     * @Column(name="auth_server", type="tinyint")
     * @Required()
     */
    private $authServer;

    /**
     * @var string $credentialPwd 蜜传密码
     * @Column(name="credential_pwd", type="string", length=255)
     */
    private $credentialPwd;

    /**
     * @var string $credentialWebOpenid web端获取的openid
     * @Column(name="credential_web_openid", type="string", length=255)
     */
    private $credentialWebOpenid;

    /**
     * @var string $credentialAppOpenid app端获取的openid
     * @Column(name="credential_app_openid", type="string", length=255)
     */
    private $credentialAppOpenid;

    /**
     * @var string $credentialUnionid unionid
     * @Column(name="credential_unionid", type="string", length=255)
     */
    private $credentialUnionid;

    /**
     * @var string $createdAt 
     * @Column(name="created_at", type="timestamp")
     */
    private $createdAt;

    /**
     * @var string $updatedAt 
     * @Column(name="updated_at", type="timestamp")
     */
    private $updatedAt;

    /**
     * @var string $deletedAt 
     * @Column(name="deleted_at", type="timestamp")
     */
    private $deletedAt;

    /**
     * @param int $value
     * @return $this
     */
    public function setId(int $value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * 用户id
     * @param int $value
     * @return $this
     */
    public function setUserId(int $value): self
    {
        $this->userId = $value;

        return $this;
    }

    /**
     * 授权平台1微信2QQ3新浪4蜜传
     * @param int $value
     * @return $this
     */
    public function setAuthServer(int $value): self
    {
        $this->authServer = $value;

        return $this;
    }

    /**
     * 蜜传密码
     * @param string $value
     * @return $this
     */
    public function setCredentialPwd(string $value): self
    {
        $this->credentialPwd = $value;

        return $this;
    }

    /**
     * web端获取的openid
     * @param string $value
     * @return $this
     */
    public function setCredentialWebOpenid(string $value): self
    {
        $this->credentialWebOpenid = $value;

        return $this;
    }

    /**
     * app端获取的openid
     * @param string $value
     * @return $this
     */
    public function setCredentialAppOpenid(string $value): self
    {
        $this->credentialAppOpenid = $value;

        return $this;
    }

    /**
     * unionid
     * @param string $value
     * @return $this
     */
    public function setCredentialUnionid(string $value): self
    {
        $this->credentialUnionid = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCreatedAt(string $value): self
    {
        $this->createdAt = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUpdatedAt(string $value): self
    {
        $this->updatedAt = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDeletedAt(string $value): self
    {
        $this->deletedAt = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 用户id
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * 授权平台1微信2QQ3新浪4蜜传
     * @return int
     */
    public function getAuthServer()
    {
        return $this->authServer;
    }

    /**
     * 蜜传密码
     * @return string
     */
    public function getCredentialPwd()
    {
        return $this->credentialPwd;
    }

    /**
     * web端获取的openid
     * @return string
     */
    public function getCredentialWebOpenid()
    {
        return $this->credentialWebOpenid;
    }

    /**
     * app端获取的openid
     * @return string
     */
    public function getCredentialAppOpenid()
    {
        return $this->credentialAppOpenid;
    }

    /**
     * unionid
     * @return string
     */
    public function getCredentialUnionid()
    {
        return $this->credentialUnionid;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

}
