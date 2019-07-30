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
 * @Table(name="login_logs")
 * @uses      LoginLogs
 */
class LoginLogs extends Model
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
     * @var int $loginPlatform 登录平台1：APP2：H53：PC
     * @Column(name="login_platform", type="tinyint")
     * @Required()
     */
    private $loginPlatform;

    /**
     * @var string $loginTime 登录时间戳
     * @Column(name="login_time", type="string", length=255, default="")
     */
    private $loginTime;

    /**
     * @var string $loginLocation 登录地点
     * @Column(name="login_location", type="string", length=255, default="")
     */
    private $loginLocation;

    /**
     * @var string $loginToken 上次登录token
     * @Column(name="login_token", type="string", length=1000, default="")
     */
    private $loginToken;

    /**
     * @var string $tokenExpiredAt 登录过期时间
     * @Column(name="token_expired_at", type="string", length=255)
     * @Required()
     */
    private $tokenExpiredAt;

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
     * 登录平台1：APP2：H53：PC
     * @param int $value
     * @return $this
     */
    public function setLoginPlatform(int $value): self
    {
        $this->loginPlatform = $value;

        return $this;
    }

    /**
     * 登录时间戳
     * @param string $value
     * @return $this
     */
    public function setLoginTime(string $value): self
    {
        $this->loginTime = $value;

        return $this;
    }

    /**
     * 登录地点
     * @param string $value
     * @return $this
     */
    public function setLoginLocation(string $value): self
    {
        $this->loginLocation = $value;

        return $this;
    }

    /**
     * 上次登录token
     * @param string $value
     * @return $this
     */
    public function setLoginToken(string $value): self
    {
        $this->loginToken = $value;

        return $this;
    }

    /**
     * 登录过期时间
     * @param string $value
     * @return $this
     */
    public function setTokenExpiredAt(string $value): self
    {
        $this->tokenExpiredAt = $value;

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
     * 登录平台1：APP2：H53：PC
     * @return int
     */
    public function getLoginPlatform()
    {
        return $this->loginPlatform;
    }

    /**
     * 登录时间戳
     * @return string
     */
    public function getLoginTime()
    {
        return $this->loginTime;
    }

    /**
     * 登录地点
     * @return string
     */
    public function getLoginLocation()
    {
        return $this->loginLocation;
    }

    /**
     * 上次登录token
     * @return string
     */
    public function getLoginToken()
    {
        return $this->loginToken;
    }

    /**
     * 登录过期时间
     * @return string
     */
    public function getTokenExpiredAt()
    {
        return $this->tokenExpiredAt;
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
